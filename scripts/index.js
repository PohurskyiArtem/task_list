//datepicker initialization
$(document).ready(() => {
	$( "#datepicker" ).datepicker();
});

$(".post").click(() => {
	$(".post p").text(() => {
		return $(".post p").text() == "Добавить" ? "Скрыть" : "Добавить";
	})
	$(".links-list__new-link-form").toggle(500);
	$(".links-list__list").toggleClass('links-hide');
});

$(".notes__content-container").blur(() => {
	console.log('unfocus')
})

//real time clock
const clock = document.querySelector('.clock');
const showCurrentTime = () => {
	let date = new Date();
	let h = date.getHours().toString();
	let m = date.getMinutes().toString();
	let s = date.getSeconds().toString();
	if (h.length < 2) {
		h = '0' + h;
	}
	if (m.length < 2) {
		m = '0' + m;
	}
	if (s.length < 2) {
		s = '0' + s;
	}
	let currentTime = h + ':' + m;
	clock.textContent = currentTime;
}
setInterval(showCurrentTime, 100);

// modal window functions

const modalAnswer = answerText => {
	$('.modal-container').css({"display": "flex", "justify-content": "center", "align-items": "center"});
	$(".modal-content-container").text(answerText);
	$(".btn-false").click(() => {
		$('.modal-container').hide();
		return false;
	})
	$(".btn-true").click(() => {
		$('.modal-container').hide();
		return true;
	})
}