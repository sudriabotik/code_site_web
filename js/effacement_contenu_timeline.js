function effacement(intitule)
{
	$("."+intitule).slideToggle();
	$(".timeline").slideToggle(1000);
	$(".timeline_resume").slideToggle(1000);
	$(".events-content").attr('style', 'height :'+'.selected'+'px');
}