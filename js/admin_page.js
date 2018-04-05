function newtopic(){
	document.getElementById('newTopic').style.cssText = ' display: block;';
	document.getElementById('allUser').style.cssText = ' display: none;';
	document.getElementById('allTopic').style.cssText = ' display: none;';

	document.getElementById('myResultTab').style.cssText = ' border-bottom-color: #0085cc;';
	document.getElementById('followedTopicTab').style.cssText = ' border-bottom-color: #f7f195;';
	document.getElementById('allTopicTab').style.cssText = ' border-bottom-color: #f7f195;';

	document.getElementById('mainHeading').innerHTML = 'Add New Topic';
}
function alltopics(){
	document.getElementById('allTopic').style.cssText = ' display: block;';
	document.getElementById('allUser').style.cssText = ' display: none;';
	document.getElementById('newTopic').style.cssText = ' display: none;';

	document.getElementById('allTopicTab').style.cssText = ' border-bottom-color: #0085cc;';
	document.getElementById('followedTopicTab').style.cssText = ' border-bottom-color: #f7f195;';
	document.getElementById('myResultTab').style.cssText = ' border-bottom-color: #f7f195;';

	document.getElementById('mainHeading').innerHTML = 'All Topics in DataBase';
}
function allusers(){
	document.getElementById('allUser').style.cssText = ' display: block;';
	document.getElementById('newTopic').style.cssText = ' display: none;';
	document.getElementById('allTopic').style.cssText = ' display: none;';

	document.getElementById('followedTopicTab').style.cssText = ' border-bottom-color: #0085cc;';
	document.getElementById('myResultTab').style.cssText = ' border-bottom-color: #f7f195;';
	document.getElementById('allTopicTab').style.cssText = ' border-bottom-color: #f7f195;';

	document.getElementById('mainHeading').innerHTML = 'Add Users';
}