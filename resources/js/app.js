import './bootstrap';
import  '../sass/app.scss';


const searchAndSortPosts = () => {
    let keyword = $("#keyword").val();
    let sort = $("#sortPosts").val();

    $.ajax({
        url: '/posts',
        type: 'get',
        data: {'keyword': keyword, 'sortBy':sort},
        success: function (data){
            $('#body').html(data)
            $("#keyword").val(keyword);
            $("#sortPosts").val(sort);
        }
    })
}

const searchAndSortUsers = () => {
    let keyword = $("#keyword-users").val();
    let sort = $("#sortUsers").val();

    $.ajax({
        url: '/users',
        type: 'get',
        data: {'keyword': keyword, 'sortBy':sort},
        success: function (data){
            $('#body').html(data)
            $("#keyword-users").val(keyword);
            $("#sortUsers").val(sort);
        }
    })
}



$(document).ready(function (){
    // SEARCH POSTS FUNCTION
    $(document).on('click', '#search', () => searchAndSortPosts());
    $(document).on('change', '#sortPosts', () => searchAndSortPosts());

    // SEARCH USERS FUNCTION
    $(document).on('click', '#search-users', () => searchAndSortUsers());
    $(document).on('change', '#sortUsers', () => searchAndSortUsers());


})


