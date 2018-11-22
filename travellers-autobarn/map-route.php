<?php
global $route_id, $atts;

// use com\cminds\mapsroutesmanager\helper\RouteView;
use com\cminds\mapsroutesmanager\App;
use com\cminds\mapsroutesmanager\model\Route;

wp_enqueue_style('cmmrm-frontend');
wp_enqueue_script('cmmrm-widget-single-route'); 

$mapId = 'map-route';
$zoom = $atts['zoom'];

$route = Route::getInstance($route_id);

?>

<div class="cmmrm-route-map-canvas-outer" style="display:<?php echo (!isset($atts['map']) OR $atts['map'] == 1) ? 'block' : 'none'; ?>">
	<div id="<?php echo $mapId; ?>" class="cmmrm-route-map-canvas" style="<?php
		if (!empty($atts['mapwidth'])) echo 'width:'. intval($atts['mapwidth']) .'px;';
		if (!empty($atts['mapheight'])) echo 'height:'. intval($atts['mapheight']) .'px;';
	?>"></div>
</div>

<script type="text/javascript">
jQuery(function() {
	var mapId = <?php echo json_encode($mapId); ?>;
	var routeData = <?php echo json_encode($route->getJSRouteData()); ?>;
	var waypointsString = <?php echo json_encode($route->getWaypointsString()); ?>;
	var locations = <?php echo json_encode($route->getJSLocations()); ?>;
	var widget = new CMMRM_WidgetSingleRoute(mapId, routeData, waypointsString, locations);
	<?php if (isset($zoom) AND is_numeric($zoom) AND $zoom > 0): ?>
		setTimeout(function() {
			widget.map.map.setZoom(<?php echo $zoom; ?>);
		}, 500);
	<?php endif; ?>
});
</script>