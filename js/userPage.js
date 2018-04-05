function myResult(){
	document.getElementById('myResultContainer').style.cssText = ' display: block;';
	document.getElementById('followedTopicContainer').style.cssText = ' display: none;';
	document.getElementById('allTopicContainer').style.cssText = ' display: none;';

	document.getElementById('myResultTab').style.cssText = ' border-bottom-color: #0085cc;';
	document.getElementById('followedTopicTab').style.cssText = ' border-bottom-color: #f7f195;';
	document.getElementById('allTopicTab').style.cssText = ' border-bottom-color: #f7f195;';

	document.getElementById('mainHeading').innerHTML = ' My Result';
}
function followedTopic(){
	document.getElementById('myResultContainer').style.cssText = ' display: none;';
	document.getElementById('followedTopicContainer').style.cssText = ' display: block;';
	document.getElementById('allTopicContainer').style.cssText = ' display: none;';

	document.getElementById('myResultTab').style.cssText = ' border-bottom-color: #f7f195;';
	document.getElementById('followedTopicTab').style.cssText = ' border-bottom-color: #0085cc;';
	document.getElementById('allTopicTab').style.cssText = ' border-bottom-color: #f7f195;';

	document.getElementById('mainHeading').innerHTML = ' Followed Topics';
}
function allTopic(){
	document.getElementById('myResultContainer').style.cssText = ' display: none;';
	document.getElementById('followedTopicContainer').style.cssText = ' display: none;';
	document.getElementById('allTopicContainer').style.cssText = ' display: block;';

	document.getElementById('myResultTab').style.cssText = ' border-bottom-color: #f7f195;';
	document.getElementById('followedTopicTab').style.cssText = ' border-bottom-color: #f7f195;';
	document.getElementById('allTopicTab').style.cssText = ' border-bottom-color: #0085cc;';

	document.getElementById('mainHeading').innerHTML = ' All Topics';
}
var a =0;
function myDetails(){
	if (a == 0) {
		document.getElementById('detailsContainer').style.cssText = ' display: block;';
		a=1;
	}
	else{
		a=0;
		document.getElementById('detailsContainer').style.cssText = ' display: none;';
	}
}
