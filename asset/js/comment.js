const commentsSection = document.getElementById('comments-section');
const commentForm = document.getElementById('comment-form');
const commentFormSubmit = document.getElementById('comment-form-submit');

// Function to load comments from server (replace with your backend logic)
function loadComments() {
  commentsSection.innerHTML = ''; // Clear existing comments
  // Simulate fetching comments from a server (replace with your API call)
  const comments = [
    {
      id: 1,
      user_id: null, // Anonymous comment
      username: 'Guest',
      comment_text: 'This video is great!',
      likes: 5,
      dislikes: 2,
      replies: [
        {
          id: 2,
          user_id: 1, // Registered user comment
          username: 'John Doe',
          comment_text: 'I agree!',
          likes: 3,
          dislikes: 0,
        }
      ]
    },
    // Add more comment objects as needed
  ];
  displayComments(comments);
}

// Function to display comments with nested replies
function displayComments(comments) {
  comments.forEach(comment => {
    const commentElement = createCommentElement(comment);
    commentsSection.appendChild(commentElement);
    if (comment.replies && comment.replies.length > 0) {
      const repliesElement = document.createElement('ul');
      repliesElement.classList.add('list-group', 'list-group-flush');
      commentElement.querySelector('.card-body').appendChild(repliesElement);
      displayComments(comment.replies, repliesElement); // Recursive call for replies
    }
  });
}

// Function to create a comment element
function createCommentElement(comment) {
    const card = document.createElement('div');
    card.classList.add('card', 'mb-3');
  
    const cardBody = document.createElement('div');
    cardBody.classList.add('card-body');
  
    let username;
    if (comment.user_id) {
      // Logged-in user comment
      username = comment.username;
      commentForm.style.display = 'block'; // Show comment form for logged-in users
    } else {
      // Anonymous comment
      username = comment.username;
      const loginLink = document.createElement('a');
      loginLink.href = '#'; // Replace with your login link
      loginLink.textContent = 'Login to comment';
      cardBody.appendChild(loginLink);
    }
  
    const header = document.createElement('h5');
    header.classList.add('card-title');
    header.textContent = username;
    cardBody.appendChild(header);
  
    const commentText = document.createElement('p');
    commentText.classList.add('card-text');
    commentText.textContent = comment.comment_text;
    cardBody.appendChild(commentText);
  
    // Like and Dislike buttons (replace with your like/dislike functionality)
    const likeButton = document.createElement('button');
    likeButton.classList.add('btn', 'btn-outline-success', 'btn-sm');
    likeButton.textContent = 'Like (' + comment.likes + ')';
    likeButton.addEventListener('click', () => {
      // Implement like functionality here (update like count, send like to server, etc.)
    });
    cardBody.appendChild(likeButton);
  
    const dislikeButton = document.createElement('button');
    dislikeButton.classList.add('btn', 'btn-outline-danger', 'btn-sm');
    dislikeButton.textContent = 'Dislike (' + comment.dislikes + ')';
    dislikeButton.addEventListener('click', () => {
      // Implement dislike functionality here (update dislike count, send dislike to server, etc.)
    });
    cardBody.appendChild(dislikeButton);
  
    // Reply button
    const replyButton = document.createElement('button');
    replyButton.classList.add('btn', 'btn-outline-primary', 'btn-sm', 'float-end');
    replyButton.textContent = 'Reply';
    replyButton.addEventListener('click', () => {
      // Handle reply functionality (show reply form below the comment)
    });
    cardBody.appendChild(replyButton);
  
    card.appendChild(cardBody);
  
    return card;
  }
  
  // Call the loadComments function on page load
  loadComments();
  
  // Handle comment form submission (replace with your logic to send comment to server)
  commentFormSubmit.addEventListener('submit', (e) => {
    e.preventDefault();
    const commentText = document.getElementById('comment-text').value;
    // Simulate sending comment (replace with your API call)
    console.log('Submitting comment:', commentText);
    // Clear comment form after submission
    document.getElementById('comment-text').value = '';
  });
  
