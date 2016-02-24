/**
 * Created by Aigars on 13.01.2016.
 */

$(document).ready(function (){
    /**
     location.name - atgriež lapas saiti, sākot ar pēdējo /
     currentpage tiek piešķirts tāds string, kurš ir izgriezts no location.pathname sākot ar elementu, kas ir aiz /
     tālāk li tagam, kura bērns ir zem #pagename li esošs a tags, kurā gabājas href ar saiti, kura sakrīt ar currentpage,
     piešķit klasi active
     */
    var currentPage=location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
    if (currentPage=="") $('#pageMenu li:first').addClass('active');
    /*window.alert(currentPage);//stringa testam*/
    $('#pageMenu li a[href="'+ currentPage +'"]').parents('li').addClass('active');
});
