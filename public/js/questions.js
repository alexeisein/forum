function updateSlug()
{
    var title = document.getElementById('title').value;
    var slug = document.getElementById('slug').value = title;
    document.getElementById('slug').style.backgroundColor="lightblue";
    document.getElementById('slug').style.color="#fff";

}