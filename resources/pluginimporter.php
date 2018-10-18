<?php
/*
Este archivo se encarga de importar todos los plugins (CSS y JS) necesarios
con tan solo enviar un array con el nombre de todos los plugins necesarios
en la página
USO:
		<?php
		require_once('../../pluginimporter.php');
		?>
		<?php
		$plugins = ['jquery',
					'bootstrap',
					'autonumeric',
					'bootbox',
					'bootstrap-tabs',
					'datatables',
					'datepicker',
					'daterangepicker',
					'filedrag',
					'fontawesome',
					'fullcalendar',
					'fullcalendarscheduler',
					'gantt',
					'highcharts',
					'icheck',
					'inputmask',
					'ionicons',
					'jqueryui',
					'leds',
					'momentjs',
					'select2',
					'slimscroll',
					'spinjs',
					'starrating',
					'timepicker',
					'treeview',
					'zeninput',
					'validator',
					'tema'];
		pluginimport('css', '../../', $plugins);


		pluginimport('js', '../../', $plugins);
		?>
*/
// Las versiones que tienen un asterisco son versiones anteriores a la fecha (10/06/2016)

//AUTONUMERIC 2.0-beta - 2014-07-02 * (Beta nueva causó problemas) (10/06/2016)
$pluginPATH['autonumeric']['js'][1]		= "vendors/plugins/autoNumeric/autoNumeric-2.0-BETA.js";

//BOOTBOX 4.4.0 (10/06/2016)
$pluginPATH['bootbox']['js'][1]			= "vendors/plugins/bootbox/bootbox.min.js";

//BOOTSTRAP 3.3.6 (10/06/2016)
$pluginPATH['bootstrap']['css'][1] 		= "vendors/theme/bootstrap/css/bootstrap.min.css";
$pluginPATH['bootstrap']['js'][1]		= "vendors/theme/bootstrap/js/bootstrap.min.js";

//BOOTSTRAP TABS (10/06/2016)
$pluginPATH['bootstrap-tabs']['css'][1]	= "vendors/plugins/bootstrap-tabs/bootstrap-tabs.css";

//DATATABLES 1.10.12 (10/06/2016)
$pluginPATH['datatables']['css'][1]		= "vendors/plugins/DataTables/css/dataTables.bootstrap.min.css";
$pluginPATH['datatables']['css'][2]		= "vendors/plugins/DataTables/extensions/FixedHeader/css/fixedHeader.bootstrap.min.css";
$pluginPATH['datatables']['css'][3]		= "vendors/plugins/DataTables/extensions/Buttons/css/buttons.dataTables.min.css";
$pluginPATH['datatables']['css'][4]		= "vendors/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css";
$pluginPATH['datatables']['css'][5]		= "vendors/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css";
$pluginPATH['datatables']['js'][1]		= "vendors/plugins/DataTables/js/jquery.dataTables.js";
$pluginPATH['datatables']['js'][2]		= "vendors/plugins/DataTables/js/dataTables.bootstrap.js";
$pluginPATH['datatables']['js'][3]		= "vendors/plugins/DataTables/jszip.min.js";
$pluginPATH['datatables']['js'][4]		= "vendors/plugins/DataTables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js";
$pluginPATH['datatables']['js'][5]		= "vendors/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js";
$pluginPATH['datatables']['js'][6]		= "vendors/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js";
$pluginPATH['datatables']['js'][7]		= "vendors/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js";
// $pluginPATH['datatables']['js'][7]		= "js/dataTableReset.js";

//DATEPICKER 1.6.1 (10/06/2016)
$pluginPATH['datepicker']['css'][1]		= "vendors/plugins/datepicker/bootstrap-datepicker3.min.css";
$pluginPATH['datepicker']['js'][1]		= "vendors/plugins/datepicker/bootstrap-datepicker.min.js";
$pluginPATH['datepicker']['js'][2]		= "vendors/plugins/datepicker/locales/bootstrap-datepicker.es.min.js";

//DATERANGEPICKER 2.1.21 (10/06/2016)
$pluginPATH['daterangepicker']['css'][1]= "vendors/plugins/daterangepicker/daterangepicker.css";
$pluginPATH['daterangepicker']['js'][1]	= "vendors/plugins/momentjs/moment-with-locales.min.js";
$pluginPATH['daterangepicker']['js'][2]	= "vendors/plugins/daterangepicker/daterangepicker.js";

//FILEDRAG (10/06/2016)
$pluginPATH['filedrag']['css'][1]		= "vendors/plugins/filedrag/filedrag.css";
$pluginPATH['filedrag']['js'][1]		= "vendors/plugins/filedrag/filedrag.js";

//FONTAWESOME 4.6.3 (10/06/2016)
$pluginPATH['fontawesome']['css'][1]	="vendors/plugins/fontawesome/css/font-awesome.min.css";

//FULL CALENDAR 2.7.3 (10/06/2016)
$pluginPATH['fullcalendar']['css'][1]  	= "vendors/plugins/fullcalendar/fullcalendar.min.css";
$pluginPATH['fullcalendar']['js'][1]	= "vendors/plugins/momentjs/moment-with-locales.min.js";
$pluginPATH['fullcalendar']['js'][2]	= "vendors/plugins/fullcalendar/fullcalendar.min.js";
$pluginPATH['fullcalendar']['js'][3]	= "vendors/plugins/fullcalendar/lang/es.js";
//FULL CALENDAR - SCHEDULER 1.3.2 (10/06/2016)
$pluginPATH['fullcalendarscheduler']['css'][1]  = "vendors/plugins/fullcalendar/scheduler.min.css";
$pluginPATH['fullcalendarscheduler']['js'][1]	= "vendors/plugins/fullcalendar/scheduler.min.js";

//GANTT (DHTMLX) 4.0.0 (10/06/2016)
$pluginPATH['gantt']['css'][1] 			= "vendors/plugins/Gantt/codebase/dhtmlxgantt.css";
$pluginPATH['gantt']['js'][1]			= "vendors/plugins/Gantt/codebase/dhtmlxgantt.js";
$pluginPATH['gantt']['js'][2]			= "vendors/plugins/Gantt/codebase/locale/locale_es.js";
$pluginPATH['gantt']['js'][3]			= "vendors/plugins/Gantt/codebase/ext/dhtmlxgantt_critical_path.js";
$pluginPATH['gantt']['js'][4]			= "vendors/plugins/Gantt/codebase/ext/dhtmlxgantt_marker.js";
$pluginPATH['gantt']['js'][5]			= "vendors/plugins/Gantt/codebase/ext/dhtmlxgantt_grouping.js";

//HIGHCHARTS (10/06/2016)
$pluginPATH['highcharts']['js'][1]		= "vendors/plugins/highcharts/highcharts.js";
$pluginPATH['highcharts']['js'][2]		= "vendors/plugins/highcharts/highcharts-more.js";
$pluginPATH['highcharts']['js'][3]		= "vendors/plugins/highcharts/modules/solid-gauge.js";

//ICHECK 1.0.2 (12/07/2015)
$pluginPATH['icheck']['css'][1] 		= "vendors/plugins/iCheck/skins/all.css";
$pluginPATH['icheck']['js'][1]			= "vendors/plugins/iCheck/icheck.min.js";

//INPUT MASK (10/06/2016)
$pluginPATH['inputmask']['js'][1]		= "vendors/plugins/input-mask/jquery.inputmask.js";

//IONICONS
$pluginPATH['ionicons']['css'][1]		= "vendors/plugins/ionicons/css/ionicons.min.css";

//JQUERY 2.2.4 * (Ultima version 2.x, con la 3.x no funciona bootstrap) (10/06/2016)
$pluginPATH['jquery']['js'][1]			= "vendors/plugins/jquery/jquery.min.js";

//JQUERY-UI (10/06/2016)
$pluginPATH['jqueryui']['js'][1]			= "vendors/plugins/jQueryUI/jquery-ui.min.js";

//LEDS
$pluginPATH['leds']['css'][1]			= "vendors/plugins/leds/leds.css";

//MOMENT.JS 2.13.0 (10/06/2016)
$pluginPATH['momentjs']['js'][1]		= "vendors/plugins/momentjs/moment-with-locales.min.js";

//SELECT2 4.0.3 (10/06/2016)
$pluginPATH['select2']['css'][1]		= "vendors/plugins/select2/css/select2.css";
$pluginPATH['select2']['css'][2]		= "vendors/plugins/select2/css/select2-bootstrap.min.css";
$pluginPATH['select2']['js'][1]			= "vendors/plugins/select2/js/select2.min.js";
$pluginPATH['select2']['js'][2]			= "vendors/plugins/select2/js/i18n/es.js";

//SLIMSCROLL
$pluginPATH['slimscroll']['js'][1]		= "vendors/plugins/slimScroll/jquery.slimscroll.min.js";

//SPIN.JS 2.3.2 (10/06/2016)
$pluginPATH['spinjs']['js'][1]			= "vendors/plugins/spin/spin.min.js";
$pluginPATH['spinjs']['js'][2]			= "vendors/plugins/spin/jquery.spin.js";

//STAR RATING 4.0.1 (10/06/2016)
$pluginPATH['starrating']['css'][1]		= "vendors/plugins/starRating/star-rating.min.css";
$pluginPATH['starrating']['js'][1]		= "vendors/plugins/starRating/star-rating.min.js";

//TEMA ADMINLTE 2.3.0 * (10/06/2016)
$pluginPATH['tema']['css'][1]			= "vendors/theme/css/AdminLTE.min.css";
$pluginPATH['tema']['css'][2]			= "vendors/theme/css/skins/_all-skins.min.css";
$pluginPATH['tema']['js'][1]			= "vendors/theme/js/adminlte.min.js";

//TIMEPICKER
$pluginPATH['timepicker']['css'][1]		= "vendors/plugins/timepicker/bootstrap-timepicker.min.css";
$pluginPATH['timepicker']['js'][1]		= "vendors/plugins/timepicker/bootstrap-timepicker.min.js";

//TREEVIEW 1.2.0 (10/06/2016)
$pluginPATH['treeview']['css'][1]		= "vendors/plugins/treeview/bootstrap-treeview.min.css";
$pluginPATH['treeview']['js'][1]		= "vendors/plugins/treeview/bootstrap-treeview.min.js";

//VALIDATOR 0.7.2-dev (10/06/2016)
$pluginPATH['validator']['css'][1]		= "vendors/plugins/formvalidation/css/formValidation.min.css";
$pluginPATH['validator']['js'][1]		= "vendors/plugins/formvalidation/js/formValidation.min.js";
$pluginPATH['validator']['js'][2]		= "vendors/plugins/formvalidation/js/framework/bootstrap.min.js";

//ZEN INPUT (10/06/2016)
$pluginPATH['zeninput']['js'][1]		= "vendors/plugins/zenInput/jquery.zeninput.js";

function pluginimport($type, $pathtoroot, $pluginsneeded){
	global $pluginPATH;
	foreach ($pluginsneeded  as $need){
		if (isset($pluginPATH[$need][$type])){
			foreach ($pluginPATH[$need][$type] as $path){
				if ($type == 'css'){
					echo '<link href="' . $pathtoroot . $path . '" rel="stylesheet" type="text/css" />' . "\xA";
				}else if($type == 'js'){
					echo '<script src="' . $pathtoroot . $path . '" type="text/javascript"></script>' . "\xA";
				}
			}
		}
	}
}
?>
