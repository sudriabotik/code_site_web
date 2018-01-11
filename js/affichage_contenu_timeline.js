function affichage(intitule)
{
	$(".timeline").slideToggle();
	$(".timeline_resume").slideToggle();
	$("."+intitule).fadeIn(1000);
	var hauteur = $("."+intitule).height();
	$(".events-content").attr('style', 'height :'+hauteur+'px');
}