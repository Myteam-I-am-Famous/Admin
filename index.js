const body = document.getElementsByTagName('body')[0]

function collapseSidebar(){
    body.classList.toggle('sidebar-expand')
}

window.onclick = function(event){
    openCloseDropdown(event)
    

}
function closeAllDropdowns(){
    var dropdowns = document.getElementsByClassName('dropdown-expand')
    for (var i=0; i < dropdowns.length; i++) {
        dropdowns[i].classList.remove('dropdown-expand')

    }
}


function openCloseDropdown(event){
    if(!event.target.matches('.dropdown-toggle')){
        closeAllDropdowns()
    }else{
        var toggle = event.target.dataset.toggle
         var content = document.getElementById(toggle)
        if (content.classList.contains('dropdown-expand')){
            closeAllDropdowns()

        }else{
            closeAllDropdowns()
            content.classList.add('dropdown-expand')
           }
        }

}