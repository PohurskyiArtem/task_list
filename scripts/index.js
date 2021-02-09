$(document).ready(() => {
	$( "#datepicker" ).datepicker();
})

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

const trash = document.querySelectorAll('.quest-item__delete-btn');
function deleteQuest(event) {
	event.target.parentElement.remove();
}
for(var i = 0; i <= trash.length; i++){
	trash[i].addEventListener('click', deleteQuest);
}


