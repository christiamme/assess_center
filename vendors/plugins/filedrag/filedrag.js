//BASED ON http://stackoverflow.com/questions/8006715/drag-drop-files-into-standard-html-file-input
//BASED ON http://fiddle.jshell.net/BADfT/12/

//BASED ON http://stackoverflow.com/questions/32062876/removing-file-from-multiple-files-uploader-on-button-click-when-using-html5-file

//PREVIEW BASED ON http://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded

$.fn.filedrag = function(options){
	var options = $.extend({
		height: '100px',
		width: '100%'
	},options);
	
	var fileInput = $(this);
	var counter = 1;
	
	$.fn.filedrag.append = function(fileName){
		if (fileName != '' && fileName != null){
			fileInput.parent().next().append('<div id="fd_file_' + counter + '"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;">' + counter + '</strong></span> ' + fileName + '&nbsp;&nbsp;</div>');
			counter = counter + 1;
		}		
	};
	
	$.fn.filedrag.preview = function(filePath){
		if (filePath != '' && filePath != null){
			fileInput.closest('.fd_dropZone').find('img').prop('src', filePath);
		}
		this.append(filePath.split(/[\\/]/).pop());
		counter = counter + 1;
	};
	
	return this.each(function(){
		var fileInput = $(this);
		
		fileInput.wrap('<div class="fd_clickHere"></div>');
		var clickZone = fileInput.closest('.fd_clickHere');

		clickZone.wrap('<div class="fd_dropZone"></div>');
		var dropZone = fileInput.closest('.fd_dropZone');
		
		var mouseOverClass = "fd_mouse-over";
		
		clickZone.prepend('o haz click aquí...');
		dropZone.prepend('<p class="dropText">Arrastra un archivo aquí...</p>');
		dropZone.prepend('<span class="fa fa-times-circle fa-lg fd_closeBtn" title="Cancelar" style="display: none;"></span>');
		dropZone.prepend('<img class="preview" />');
		dropZone.append('<div class="fd_filename"></div>');
		var fileName = dropZone.find('.fd_filename');

		//CSS to elements
		fileInput.css({'width': '300px'});
		dropZone.css({'min-height': options.height,
						'width': options.width ,
						'line-height': lineheight + 'px'});
		
		var dropZoneHeight = parseInt(dropZone.css('height'));
		var lineheight = dropZoneHeight * 0.70;
		dropZone.css({'line-height': lineheight + 'px'});	
		var clickZoneTop = dropZoneHeight * 0.50;
		clickZone.css({'top': clickZoneTop + 'px'});

		//EVENTS
		var ooleft = dropZone.offset().left;
		var ooright = dropZone.outerWidth() + ooleft;
		var ootop = dropZone.offset().top;
		var oobottom = dropZone.outerHeight() + ootop;
		var inputFile = dropZone.find("input");

		dropZone.on('dragover', function(e){
			e.preventDefault();  
			e.stopPropagation();
			dropZone.addClass(mouseOverClass);
			var x = e.originalEvent.pageX;
			var y = e.originalEvent.pageY;
			
			if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
				inputFile.offset({ top: y - 15, left: x - 100 });
			} else {
				inputFile.offset({ top: -400, left: -400 });
			}
		});
		
		var oleft = clickZone.offset().left;
		var oright = clickZone.outerWidth() + oleft;
		var otop = clickZone.offset().top;
		var obottom = clickZone.outerHeight() + otop;

		clickZone.mousemove(function (e) {
			var x = e.pageX;
			var y = e.pageY;
			if (!(x < oleft || x > oright || y < otop || y > obottom)) {
				inputFile.offset({ top: y - 15, left: x - 160 });
			} else {
				inputFile.offset({ top: -400, left: -400 });
			}
		});
		
		dropZone.on('drop dragleave', function(e){
			if (fileInput.is(':disabled')){
				e.preventDefault();  
				e.stopPropagation();
			}
			dropZone.removeClass(mouseOverClass);	
		});
		
		fileInput.on('change', function(){
			// finalFiles = {};
			fileName.html("");
			counter = 1;
			
			if (fileInput.val() == ''){
				dropZone.find('.fd_closeBtn').hide();
			}else{
				dropZone.find('.fd_closeBtn').show();
			}
			
			if (fileInput.attr('accept')){
				var acceptedTypes = fileInput.attr('accept').toLowerCase().split(",");
			}

			var files = fileInput.prop("files");
			$.each(files, function(index, file){
			   // finalFiles[index]=file;
				fileName.append('<div id="fd_file_'+ counter +'"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;">' + counter + '</strong></span> ' + file.name + '&nbsp;&nbsp;</div>');
				
				if (acceptedTypes && 
					acceptedTypes.length > 0  &&
					$.inArray("." + file.name.split('.').pop().toLowerCase(), acceptedTypes) == -1 &&
					$.inArray(file.type , acceptedTypes) == -1 ){
					fileInput.val('').trigger('change');
					return false;
				}
				counter = counter + 1;
			});
			
			//Show preview
			if (fileInput.prop("files") && fileInput.prop("files")[0]) {
				var extension = fileInput.prop("files")[0].name.split('.').pop().toLowerCase();
				if (extension == "jpg" || extension == "jpeg" || extension == "png" || extension == "gif" ){
					var reader = new FileReader();
					
					reader.onload = function (e) {
						dropZone.find('.preview').prop('src', e.target.result);
					}
					
					reader.readAsDataURL(fileInput.prop("files")[0]);
				}else{
					dropZone.find('.preview').prop('src', '');
				}
			}else{
				dropZone.find('.preview').prop('src', '');
			}
		});
		
		dropZone.find('.fd_closeBtn').click(function(){
			fileInput.val('').trigger('change');
			dropZone.find('.preview').prop('src', '');
		});
	});
};