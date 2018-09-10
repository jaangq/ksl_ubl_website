<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		<title>elFinder 2.1.x source version with PHP connector</title>

		<!-- Section CSS -->
		<!-- jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- Section JavaScript -->
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>

		<!-- Extra contents editors (OPTIONAL) -->
		<script src="js/extras/editors.default.min.js"></script>

		<!-- GoogleDocs Quicklook plugin for GoogleDrive Volume (OPTIONAL) -->
		<!--<script src="js/extras/quicklook.googledocs.js"></script>-->

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder(
					// 1st Arg - options
					{
						cssAutoLoad : false,               // Disable CSS auto loading
						baseUrl : './',                    // Base URL to css/*, js/*
						url : 'php/connector.minimal.php',  // connector URL (REQUIRED)
						// , lang: 'ru'                    // language (OPTIONAL)
						// managers : {
						// 	// 'DOM Element ID': { /* elFinder options of this DOM Element */ }
					  //   'elfinder': {
					  //       getFileCallback : function(file, fm) {
						// 				console.log('heo');
					            // window.opener.CKEDITOR.tools.callFunction((function() {
					            //     var reParam = new RegExp('(?:[\?&]|&amp;)CKEditorFuncNum=([^&]+)', 'i') ;
					            //     var match = window.location.search.match(reParam) ;
					            //     return (match && match.length > 1) ? match[1] : '' ;
					            // })(), fm.convAbsUrl(file.url));
					            // fm.destroy();
					            // window.close();
					        // }
					  //       , height : '100%'   // optional
					  //       , resizable : false // optional
					  //   }
						// }
					},
					// 2nd Arg - before boot up function
					function(fm, extraObj) {
						// `init` event callback function
						fm.bind('init', function() {
							// Optional for Japanese decoder "encoding-japanese.js"
							if (fm.lang === 'ja') {
								fm.loadScript(
									[ '//cdn.rawgit.com/polygonplanet/encoding.js/1.0.26/encoding.min.js' ],
									function() {
										if (window.Encoding && Encoding.convert) {
											fm.registRawStringDecoder(function(s) {
												return Encoding.convert(s, {to:'UNICODE',type:'string'});
											});
										}
									},
									{ loadType: 'tag' }
								);
							}
						});
						// Optional for set document.title dynamically.
						var title = document.title;
						fm.bind('open', function() {
							var path = '',
								cwd  = fm.cwd();
							if (cwd) {
								path = fm.path(cwd.hash) || null;
							}
							document.title = path? path + ':' + title : title;
						}).bind('destroy', function() {
							document.title = title;
						});
					}
				);
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>
		<script type="text/javascript">
		// // elfinder upload event
			var options = {
			url  : 'php/connector.minimal.php',
			lang : 'en',
			handlers: {
					dblclick: function(file, fm) {
						var re = /(.+),.*$/;
						var fileURL = $('.elfinder-stat-selected').text().match(re);
						fileURL = fileURL[1];
						var storage = $('.elfinder-path-dir').eq(0).text();
						var folder = $('.elfinder-path-dir').eq(1).text();
						var fullURL = '/'+storage+'/'+folder+'/'+fileURL;
						window.opener.CKEDITOR.tools.callFunction((function() {
							var reParam = new RegExp('(?:[\?&]|&amp;)CKEditorFuncNum=([^&]+)', 'i') ;
							var match = window.location.search.match(reParam) ;
							return (match && match.length > 1) ? match[1] : '' ;
						})(), fm.convAbsUrl(fullURL));
							fm.destroy();
							window.close();
					file.preventDefault();
					}
			}
		}
		var elfinderInstance =  $('#elfinder').elfinder(options).elfinder('instance');

		elfinderInstance.bind('upload', function(event) {
			let fileUpload = event.data.added;
			let length = fileUpload.length;
			var jsData = [];
			for (var i = 0; i < length; i++) {
				jsData[i] = {
					name: fileUpload[i].name,
					mime: fileUpload[i].mime,
					size: fileUpload[i].size,
					hash: fileUpload[i].hash
				};
			}
			jsData = JSON.stringify(jsData);
			$.ajax({
			 type: 'POST',
			 url: '/ksl/admin/upload_files/add',
			 data: {jsData:jsData},
			 success: function(data) {
			 }, error : function(data) {
			 }
			});
		});
		elfinderInstance.bind('remove', function(event) {
			let jsData = event.data.removed;
			jsData = JSON.stringify(jsData);
			$.ajax({
			 type: 'DELETE',
			 url: '/ksl/admin/upload_files/destroy',
			 data: {jsData:jsData},
			 success: function(data) {
			 }, error : function(data) {
			 }
			});
		});
		elfinderInstance.bind('rename', function(event) {
			let fileUpload = event.data.added;
			let length = fileUpload.length;
			var jsData = [];
			for (var i = 0; i < length; i++) {
				jsData[i] = {
					name: fileUpload[i].name,
					mime: fileUpload[i].mime,
					size: fileUpload[i].size,
					hash: fileUpload[i].hash
				};
			}
			jsData = JSON.stringify(jsData);
			$.ajax({
			 type: 'POST',
			 url: '/ksl/admin/upload_files/add',
			 data: {jsData:jsData},
			 success: function(data) {
			 }, error : function(data) {
			 }
			});
		});

		</script>
	</body>
</html>
