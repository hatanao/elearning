(function(){
    $('.form-prevent-multiple-submits').on('submit', function(){
        $('.btn-prevent-multiple-submits').attr('disabled', 'true');
    })
})();


function clickStopper(e)
{
  e.preventDefault(); // equivalent to 'return false'
}
