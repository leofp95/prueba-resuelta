<footer class="pb_footer bg-light" role="contentinfo">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="p-2" alt="Enlace de Facebook"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#" class="p-2" alt="Enlace de Twitter"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" class="p-2" alt="Enlace de Linkedin"><i class="fa fa-linkedin"></i> </a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <p class="pb_font-14">&copy; 2020. Todos los derechos Reservados. <br>  <a href="http://www.intel.com" alt="Enlace de Intel">Intel Corporation</a> - Sistema de Hidrantes</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- loader -->
    <div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#1d82ff"/></svg></div>

    <script type="text/javascript">
                var pureCoverage = false;
                // if this is just a coverage or a group of them, disable a few items,
                // and default to jpeg format
                var format = 'image/png';
                //var bounds = [-74.0118315772888, 40.70754683896324, -74.00153046439813, 40.719885123828675];
                var bounds = [-84.22143, 10.01097, -84.20651, 10.02153];
                if (pureCoverage) {
                        document.getElementById('antialiasSelector').disabled = true;
                        document.getElementById('jpeg').selected = true;
                        format = "image/jpeg";
                }

                var supportsFiltering = true;
                if (!supportsFiltering) {
                        document.getElementById('filterType').disabled = true;
                        document.getElementById('filter').disabled = true;
                        document.getElementById('updateFilterButton').disabled = true;
                        document.getElementById('resetFilterButton').disabled = true;
                }

                var mousePositionControl = new ol.control.MousePosition({
                        className: 'custom-mouse-position',
                        target: document.getElementById('location'),
                        coordinateFormat: ol.coordinate.createStringXY(5),
                        undefinedHTML: '&nbsp;'
                });
                var mimapa = new ol.layer.Tile({
                        source: new ol.source.OSM()
                        });
                var hidrantes = new ol.layer.Image({
                        source: new ol.source.ImageWMS({
                        ratio: 1,
                        //url: 'http://localhost:8080/geoserver/tiger/wms',
                        url: 'http://localhost:8085/geoserver/sistema_hidrantes/wms',
                        params: {'FORMAT': format,
                                'VERSION': '1.1.1',  
                                //"LAYERS": 'tiger:poi',
                                "LAYERS": 'sistema_hidrantes:hidrantes',
                                "exceptions": 'application/vnd.ogc.se_inimage',
                        }
                        })
                });
                var projection = new ol.proj.Projection({
                        code: 'EPSG:4326',
                        units: 'degrees',
                        axisOrientation: 'neu',
                        global: true
                });
                var map = new ol.Map({
                        controls: ol.control.defaults({
                        attribution: false
                        }).extend([mousePositionControl]),
                        target: 'map',
                        layers: [
                        mimapa,
                        hidrantes
                        ],
                        view: new ol.View({
                        projection: projection
                        })
                });
                map.getView().on('change:resolution', function(evt) {
                        var resolution = evt.target.get('resolution');
                        var units = map.getView().getProjection().getUnits();
                        var dpi = 25.4 / 0.28;
                        var mpu = ol.proj.METERS_PER_UNIT[units];
                        var scale = resolution * mpu * 39.37 * dpi;
                        if (scale >= 9500 && scale <= 950000) {
                        scale = Math.round(scale / 1000) + "K";
                        } else if (scale >= 950000) {
                        scale = Math.round(scale / 1000000) + "M";
                        } else {
                        scale = Math.round(scale);
                        }
                        document.getElementById('scale').innerHTML = "Scale = 1 : " + scale;
                });
                map.getView().fit(bounds, map.getSize());
                map.on('singleclick', function(evt) {
                        document.getElementById('nodelist').innerHTML = "Loading... please wait...";
                        var view = map.getView();
                        var viewResolution = view.getResolution();
                        var source = untiled.get('visible') ? untiled.getSource() : tiled.getSource();
                        var url = source.getGetFeatureInfoUrl(
                        evt.coordinate, viewResolution, view.getProjection(),
                        {'INFO_FORMAT': 'text/html', 'FEATURE_COUNT': 50});
                        if (url) {
                        document.getElementById('nodelist').innerHTML = '<iframe seamless src="' + url + '"></iframe>';
                        }
                });

                // sets the chosen WMS version
                function setWMSVersion(wmsVersion) {
                        map.getLayers().forEach(function(lyr) {
                        lyr.getSource().updateParams({'VERSION': wmsVersion});
                        });
                        if(wmsVersion == "1.3.0") {
                        origin = bounds[1] + ',' + bounds[0];
                        } else {
                        origin = bounds[0] + ',' + bounds[1];
                        }
                        tiled.getSource().updateParams({'tilesOrigin': origin});
                }

                // Tiling mode, can be 'tiled' or 'untiled'
                function setTileMode(tilingMode) {
                        if (tilingMode == 'tiled') {
                        untiled.set('visible', false);
                        tiled.set('visible', true);
                        } else {
                        tiled.set('visible', false);
                        untiled.set('visible', true);
                        }
                }

                function setAntialiasMode(mode) {
                        map.getLayers().forEach(function(lyr) {
                        lyr.getSource().updateParams({'FORMAT_OPTIONS': 'antialias:' + mode});
                        });
                }

                // changes the current tile format
                function setImageFormat(mime) {
                        map.getLayers().forEach(function(lyr) {
                        lyr.getSource().updateParams({'FORMAT': mime});
                        });
                }

                function setStyle(style){
                        map.getLayers().forEach(function(lyr) {
                        lyr.getSource().updateParams({'STYLES': style});
                        });
                }

                function setWidth(size){
                        var mapDiv = document.getElementById('map');
                        var wrapper = document.getElementById('wrapper');

                        if (size == "auto") {
                        // reset back to the default value
                        mapDiv.style.width = null;
                        wrapper.style.width = null;
                        }
                        else {
                        mapDiv.style.width = size + "px";
                        wrapper.style.width = size + "px";
                        }
                        // notify OL that we changed the size of the map div
                        map.updateSize();
                }

                function setHeight(size){
                        var mapDiv = document.getElementById('map');
                        if (size == "auto") {
                        // reset back to the default value
                        mapDiv.style.height = null;
                        }
                        else {
                        mapDiv.style.height = size + "px";
                        }
                        // notify OL that we changed the size of the map div
                        map.updateSize();
                }

                function updateFilter(){
                        if (!supportsFiltering) {
                        return;
                        }
                        var filterType = document.getElementById('filterType').value;
                        var filter = document.getElementById('filter').value;
                        // by default, reset all filters
                        var filterParams = {
                        'FILTER': null,
                        'CQL_FILTER': null,
                        'FEATUREID': null
                        };
                        if (filter.replace(/^\s\s*/, '').replace(/\s\s*$/, '') != "") {
                        if (filterType == "cql") {
                        filterParams["CQL_FILTER"] = filter;
                        }
                        if (filterType == "ogc") {
                        filterParams["FILTER"] = filter;
                        }
                        if (filterType == "fid")
                        filterParams["FEATUREID"] = filter;
                        }
                        // merge the new filter definitions
                        map.getLayers().forEach(function(lyr) {
                        lyr.getSource().updateParams(filterParams);
                        });
                        }

                        function resetFilter() {
                        if (!supportsFiltering) {
                        return;
                        }
                        document.getElementById('filter').value = "";
                        updateFilter();
                        }

                        // shows/hide the control panel
                        function toggleControlPanel(){
                        var toolbar = document.getElementById("toolbar");
                        if (toolbar.style.display == "none") {
                        toolbar.style.display = "block";
                        }
                        else {
                        toolbar.style.display = "none";
                        }
                        map.updateSize()
                        }

                </script>

	</body>
</html>
