$(function() {
    $('#choosePerson').change(function(){
        $('.personOption').hide();
        $("." + $(this).val()).show();
    });
    
    $('#chooseContact').change(function(){
      $('.contactOption').hide();
      $("#" + $(this).val()).show();
    });
});
