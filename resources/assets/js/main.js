function exists(selector) {
	return $(selector).length;
}

function byId(id) {
	return document.getElementById(id)
}

function createSlideImageContainer(id) {
	Sortable.create(byId('slide-content-' + id), {
		sort: true,
		group: {
			name: 'slides',
			pull: true,
			put: true
		},
		animation: 150
	});
}

if (exists('#images')) {
	Sortable.create(byId('images'), {
		sort: false,
		group: {
			name: 'slides',
			pull: 'clone',
			put: false
		},
		animation: 150
	});
}

$('#addSlide').on('click',function(event){
	event.preventDefault();
	var id = $(this).attr('data-id');
	if (typeof id !== 'undefined') {
		$.get('/dashboard/slide/create/'+id, function(data){
			if (data.id !== 'undefined') {
				$('#slides').append('<li class="slide" id="slide-'+data.id+'"><span class="drag-handle">☰</span><ul id="slide-content-'+data.id+'"></ul><a onClick="removeSlide('+data.id+')"" href="javascript:void(0)" class="remove-slide">Remove</a></li>');
				createSlideImageContainer(data.id);
			}
		},'json');
	}
});

if (exists('#slides')) {
	Sortable.create(byId('slides'), {
		handle: '.drag-handle',
		animation: 150,
		group: {
			name: 'slides-order'
		}
	});
}

function removeSlide(id) {
	$.get('/dashboard/slide/'+id+'/delete', function(data){
		if (typeof data.result !== 'undefined' && data.result) {
			$('#slide-'+id).remove();
		}
	}, 'json');
}

$('.remove-slide').on('click', function(event){
	event.preventDefault();
	var closest = $(this).closest('li.slide');
	var id = $(closest).attr('id');
	id = id.replace(/[^0-9.]/g, '');
	removeSlide(id);
});

$('#slides li.slide').each(function(){
	var id = $(this).attr('id');
	id = id.replace(/[^0-9.]/g, '');
	createSlideImageContainer(id);
});

// when we click save
$('#saveLayout').on('click',function(){
	var array = [];
	// loop through slides
	$('#slides li.slide').each(function(){
		var id = $(this).attr('id');
		id = id.replace(/[^0-9.]/g, '');
		var images = [];
		$('ul li', this).each(function(){
			var image_id = $(this).attr('id');
			image_id = image_id.replace(/[^0-9.]/g, '');
			images.push(image_id);
		});
		array.push({'id': id, 'images': images});
	});
	var url = window.location.href;
	var token = $('meta[name="csrf-token"]').attr('content');
	var data = {'_token': token, 'json': JSON.stringify(array)};
	$.post(url, data,
		function(){
			
		},
	'json');
});

if ($('#fullpage').length) {
	$('#fullpage').fullpage({
		navigation: false,
		anchors: ['about', 'services', 'gallery', 'contact'],
	});
}

$('#fullpage-menu a').on('click', function(e){
	e.preventDefault();
	var section = $(this).attr('data-section');
	$.fn.fullpage.moveTo(parseInt(section, 10));
});

$(window).on('hashchange',function(){ 
    $('.navbar-nav li').each(function() {
		$(this).removeClass('active');
		if ($(this).attr('data-name') == window.location.hash.replace('#','')) {
			$(this).addClass('active');
		}
	});
});

$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

$('.open-lightbox').on('click', function(){
	var id = $(this).attr('data-lightbox-id');
	$('.gallery-' + id).first().click();
});

