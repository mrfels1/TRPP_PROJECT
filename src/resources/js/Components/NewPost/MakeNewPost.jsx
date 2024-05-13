import React, { useState } from 'react';
import './makepostStyle.css'; 
import { Link, useHistory } from 'react-router-dom';
import axios from 'axios';

function MakeNewPost({ addPost }) {
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const history = useHistory();
  const handleTitleChange = (event) => {
    setTitle(event.target.value);
  };

  const handleContentChange = (event) => {
    setContent(event.target.value);
  };

  const handleSubmit = async () => {
       try {
         const response = await axios.post('/createpost', { title, content });
         addPost(response.data); 
         setTitle('');
         setContent('');
         history.push('/all-posts');
       } catch (error) {
         console.error('Error creating post:', error);
       }
     };

  const handleCancel = () => {
    console.log('Post creation canceled');
    history.push('/forum');
  };

  return (

    <div className="create-post-container">
    <div className="create-header">
      <h1>Create Post</h1>
      <div className='underline'> </div>
    </div>
      <div className="input-container">
        <input  type="text"  placeholder="Title"
          value={title}   onChange={handleTitleChange}  
          className="title-input"
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
