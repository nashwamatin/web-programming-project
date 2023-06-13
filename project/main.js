// nav background
let header = document.querySelector("header");

window.addEventListener("scroll", () => {
    header.classList.toggle("shadow", window.scrollY > 0)
})

//Filter
$(document).ready(function () {
    $(".filter-item").click(function () {
        const value = $(this).attr("data-filter");
        if (value == "all"){
            $(".post-box").show("1000")
        } else{
            $(".post-box")
                .not("." + value)
                .hide(1000);
            $(".post-box")
            .filter("." + value)
            .show("1000")
        }
    });
    $(".filter-item").click(function () {
        $(this).addClass("active-filter").siblings().removeClass("active-filter")
    });
});
// Get the form and comment list elements
const commentForm = document.getElementById('comment-form');
const commentList = document.getElementById('comment-list');

// Add event listener to the form submission
commentForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent form submission

    // Get the values from the form
    const name = document.getElementById('name').value;
    const comment = document.getElementById('comment').value;

    // Create a new comment element
    const newComment = document.createElement('div');
    newComment.classList.add('comment');
    newComment.innerHTML = `<h3>${name}</h3><p>${comment}</p>`;

    // Append the new comment to the comment list
    commentList.appendChild(newComment);

    // Clear the form inputs
    document.getElementById('name').value = '';
    document.getElementById('comment').value = '';
});

/// YouTube Videos
function createYouTubeVideo(videoId) {
    const videoContainer = document.createElement('div');
    videoContainer.classList.add('video-container');

    const iframe = document.createElement('iframe');
    iframe.width = '560';
    iframe.height = '315';
    iframe.src = `https://www.youtube.com/embed/${videoId}`;
    iframe.title = 'YouTube video player';
    iframe.frameborder = '0';
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
    iframe.allowFullscreen = true;

    videoContainer.appendChild(iframe);

    return videoContainer;
}

const videoContainer1 = createYouTubeVideo('9K_CZizKdVs');
const videoContainer2 = createYouTubeVideo('UxQg3_Cmwhw');

$('.about .video-container').first().replaceWith(videoContainer1);
$('.about .video-container').last().replaceWith(videoContainer2);
