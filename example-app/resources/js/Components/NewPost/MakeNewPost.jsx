// import { useHistory } from 'react-router-dom';
// import React from 'react';


// const createPost = async (postData) => {
//     try {
//       const response = await fetch('/api/posts', {
//         method: 'POST',
//         headers: {
//           'Content-Type': 'application/json'
//         },
//         body: JSON.stringify({ content: postData })
//       });
  
//       return response;
//     } catch (error) {
//       throw new Error('Failed to create post:', error);
//     }
//   };
  
// function MakeNewPost() {
//   const [postContent, setPostContent] = useState('');
//   const history = useHistory();

//   const handlePostContentChange = (event) => {
//     setPostContent(event.target.value);
//   };

//   const handlePostButtonClick = async () => {
//     try {
      // Проверяем, что содержимое поста не пустое
    //   if (postContent.trim() === '') {
    //     alert('Please enter some content for the post.');
    //     return;
    //   }
  
      // Отправляем запрос на сервер для создания нового поста
    //   const response = await createPost(postContent);
  
      // Проверяем успешность запроса
    //   if (response.status === 201) {
    //     alert('Post created successfully!');
        
        // Перенаправляем пользователя на главную страницу Forum
    //     history.push('/');
    //   } else {
        // Обрабатываем ошибку, если запрос завершился неудачно
//         alert('Failed to create post. Please try again later.');
//       }
//     } catch (error) {
//       console.error('Error creating post:', error);
//       alert('An error occurred while creating the post. Please try again later.');
//     }
//   };

//   return (
//     <div className="make-new-post-container">
//       <h2>Create New Post</h2>
//       <textarea
//          value={postContent}
//          onChange={handlePostContentChange}
//         placeholder="Enter your post content..."
//         className="post-textarea"
//       />
//       <button 
//      onClick={handlePostButtonClick}
//        className="post-button">
//         Post
//       </button>
//     </div>
//   );
// }

// export default MakeNewPost;
import React, { useState } from 'react';
import './makepostStyle.css'; // Подключаем стили
import { Link } from 'react-router-dom';
function MakeNewPost() {
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');

  const handleTitleChange = (event) => {
    setTitle(event.target.value);
  };

  const handleContentChange = (event) => {
    setContent(event.target.value);
  };

  const handleSubmit = () => {
    // Ваша логика для отправки поста
    console.log('Title:', title);
    console.log('Content:', content);
    // Здесь вы можете добавить отправку данных на сервер или другие необходимые действия
  };

  const handleCancel = () => {
    // Ваша логика для отмены создания поста
    console.log('Post creation canceled');
  };

  return (

    <div className="create-post-container">
    <div className="create-header">
      <h1>Create Post</h1>
      <div className='underline'> </div>
      </div>
      <div className="input-container">
        <input  type="text"  placeholder="Title"
          value={title}   onChange={handleTitleChange}  className="title-input"
        />
      </div>
      <div className="input-container">
        <textarea
          placeholder="Content"
          value={content}
          onChange={handleContentChange}
          className="content-input"
        />
      </div>
      <div className="button-container">

        <button onClick={handleSubmit} className="submit-button">Create Post</button>

        {/* <button onClick={handleCancel} className="cancel-button">Cancel</button> */}
        <Link to="/forum" className="cancel-button">Cancel</Link>
      </div>
    </div>
  );
}

export default MakeNewPost;
