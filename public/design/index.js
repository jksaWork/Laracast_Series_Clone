window.onscroll = function(){
	document.querySelector('nav').classList.add('box_shadow');
	if(this.scrollTop  <50 ){
	document.querySelector('nav').classList.remove('box_shadow');
	}
}
document.querySelector('.custom_icon').onclick = ()=>{
	alert('good');
}