/* Developed 2014.07.23 by: =========
// 	Trozzolo Communications Group
// 	811 Wyandotte, Kansas City, MO 64105
// 	816.842.8111 | trozzolo.com
// for: CMS */

//===================================
//  Document Ready Logic


$(document).ready(function() {

	//- EDIT WINDOW POPUP -----------
		edit007();

	//- CLOSE EDIT POPUP WINDOW -----
		$('body').on('click', '#editclose, #cancel-edit', function() {
			closePopUpDiv('editmode');
		});

	//- PROGRESS GIF ----------------
		$('body').on('click', '.update-progress', function() {
			openLoading();
		});

	//- UPDATE EDIT POPUP WINDOW  -----
		$('body').on('click', '#update-edit', function() {
			editUpdate();
		});

	//- UPLOAD FILE PT 1  -----
		$('body').on('click', '.file-upload-link', function() {
			$('#linkupload').trigger('click');
		});

	//= UPLOAD FILE PT 2  -----
		$('body').on('change', '#linkupload', function() {
			var fileName = $("#linkupload").val();
			$('#image1').val(fileName);
			$("#form-upload").trigger('submit');
		});

	//- ADD POD TO TEMPLATE -----
		$('body').on('click', '#add-pod', function() {
			e.preventDefault();
			addPodToTemplate()
		});

	//-	INIT JQUERY UI DATEPICKERS ---
		$('.datepicker').datepicker({
			dateFormat: "yy-mm-dd"
		});

}); //END $(document).ready

//===================================
//  Functions

function addPodToTemplate() {
	thisdata = $(this).attr('data-url');
	var parmsArr = thisdata.split(',');
	$.ajax({
			url: '?id='+parmsArr[0]+'&table='+parmsArr[1]+'&action='+parmsArr[2]
		}).done(function(newpage) {
			alert(newpage);
		}).fail(function(jqXHR, textStatus) {
			alert('Update Failed: ' + textStatus);
	});
}

function edit007(){
	$( ".edit007" ).on("click", function(e) {
		e.preventDefault();
		thisdata = $(this).attr('data-parms');
		var parmsArr = thisdata.split(',');
		editme(parmsArr[0],parmsArr[1],parmsArr[2]);
	});
}

function editme(myid,mytable,myaction) {
	if (myaction == 'remove') {
		if (confirm("Are you sure you want to remove this item?")) {
			$.ajax({
					url: '?id='+myid+'&table='+mytable+'&action=do_delete'
				}).done(function(newpage) {
					closePopUpDiv('editmode');
					alert(newpage);
					location.reload();
				}).fail(function(jqXHR, textStatus) {
					alert('Update Failed: ' + textStatus);
			});
		}
	} else {
		openOverlay();
		//fetch the edit form
		$.ajax({
			url: '?id='+myid+'&table='+mytable+'&action='+myaction
		}).done(function(data) {
			var respHTML = $.parseHTML( data );
			var wysiwyg = $(respHTML).find('textarea.tinymce');
			var datepicker = $(respHTML).find('.datepicker');
			var advMode = $(respHTML).find('.advTogglr');

			if ($('#editmode').length){
				$('#editmode').remove();
			}
			var editDiv = '<div id="editmode" class="draggable"></div>';
			$(editDiv).hide().appendTo('body');

			$('#editmode').css('top',(window.pageYOffset+50)+'px').html(data).fadeIn('slow', function() {
				$(this).resizable( {
						handles: 'n,e,se,s,sw,w,nw'
					}).draggable({
					containment: 'html',
					cancel: '.nodrag, #editclose, input, select, .mce-panel'
				});

				if(datepicker.length) {
					$('.datepicker').datepicker({
						dateFormat: "yy-mm-dd"
					});
				}

				if(wysiwyg.length) {
					loadTinyMCE();
				}

				//initialize advanced > editmode
				if( advMode.length ) {
					$('.advanced').on('click','h3',function(e) {
						$(this).toggleClass('active');
						$('.advTogglr').stop().slideToggle();
						e.stopPropagation();
					});
				}
			});
		}).fail(function(jqXHR, textStatus) {
			closeLoading();
			alert(textStatus);
		});
	}
}

$(window).scroll(function(){
	$('#editmode').css('top',(window.pageYOffset+50)+'px');
});

function editUpdate(){
	thisdata = $('#update-edit').attr('data-parms');
	var parmsArr = thisdata.split(',');
	var myid = parmsArr[0];
	var mytable = parmsArr[1];
	var myaction = parmsArr[2];

	openLoading()
	tinyMCE.triggerSave(); // make tinyMCE fields available
	$.ajax({
			url: '?id='+myid+'&table='+mytable+'&action=do_'+myaction,
			type: 'POST',
			data: $('form').serialize()
		}).done(function(newpage) {
			closePopUpDiv('editmode');
			alert(newpage);
			location.reload();
		}).fail(function(jqXHR, textStatus){
			closeLoading()
			alert('Update Failed: ' + textStatus);
	});
}

function closePopUpDiv(divid){
	$('#'+divid).fadeOut('slow',function(){
		tinymce.remove(".tinymce");	//close tinymce
		closeOverlay();
		$('#'+divid).remove();
	});
}

function openLoading(){
	var loadDiv = '<div id="load-div" class="load"><img src="_img/_site/loader-gray.gif"></div>';
	if($('#load-div').length === 0){
		$(loadDiv).appendTo('body');
	}
}

function closeLoading(){
	if($('#load-div').length){
		$('#load-div').remove();
	}
}

//===================================
//  Tiny MCE

function loadTinyMCE() {
	tinymce.init({
		selector: ".tinymce",
		theme: "modern",
		menubar : false,
		resize: "both",
		//width: '300',
		height: '300',
		plugins: "autolink searchreplace charmap link image code wordcount hr anchor paste table",
		image_advtab: true,
		extended_valid_elements: "span, sup, sub",
		paste_word_valid_elements: "b,strong,i,em,h1,h2,span",
		paste_data_images: false,
		content_css: "_css/tinymce-content.css",
		style_formats: [
			{title: 'Header 1', block: 'h1'},
			{title: 'Header 2', block: 'h2'},
			{title: 'Header 3', block: 'h3'},
			{title: 'Header 4', block: 'h4'},
			{title: 'paragraph', block: 'p'}
		],
		browser_spellcheck : true,
		toolbar1: "bold italic underline strikethrough | superscript subscript charmap | blockquote removeformat | styleselect | cut copy paste pastetext | searchreplace",
		toolbar2: "bullist numlist outdent indent | alignleft aligncenter alignright | undo redo | table hr | image link unlink anchor | code",
		//toolbar3: "image link unlink anchor | code removeformat searchreplace"
		file_browser_callback: RoxyFileBrowser
	});
}

function RoxyFileBrowser(field_name, url, type, win) {
	var roxyFileman = '/_js/fileman/index.html';
	if (roxyFileman.indexOf("?") < 0) {
		roxyFileman += "?type=" + type;
	} else {
		roxyFileman += "&type=" + type;
	}
	roxyFileman += '&input=' + field_name + '&value=' + document.getElementById(field_name).value;
	tinyMCE.activeEditor.windowManager.open({
		file: roxyFileman,
		title: 'Manage Files',
		width: 800,
		height: 600,
		resizable: "yes",
		plugins: "media",
		inline: "yes",
		close_previous: "no"
	}, {
		window: win,
		input: field_name
	});
	return false;
}