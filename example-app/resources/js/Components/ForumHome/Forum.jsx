import React, { useState } from 'react';
import Mylogo from '../Assets/LLLogo.png';
import create from '../Assets/CreateButton.svg';
import pressedCreate from '../Assets/PressedCreateButton.svg';
import Blackuser from '../Assets/Blackuser.png';
import './styleHome.css';
import Seconduser from '../Assets/Whiteuser.png';
import Search from '../Assets/search.png';
import arrowUp from '../Assets/up-arrow.png';
import arroeDown from '../Assets/download.png';
import reply from '../Assets/reply.png';
import { Link } from 'react-router-dom';
import axios from 'axios';
function Forum() {
  
  const [isPressed, setIsPressed] = useState(false);
  const [posts, setPosts] = useState([]);

  // Функция для добавления нового поста
  const addPost = (newPost) => {
    setPosts([...posts, newPost]);
  };

  const handleCreateButtonClick = () => {
    setIsPressed(!isPressed);
  };
    return (
        <div className="forum-container">
      <header className="forum-header">
        <img src={Mylogo} alt="Forum Logo" className="forum-logo" />
        <div className="search-container">
          <img src={Search} alt="User" className="user-icon" />
          <input type="text" placeholder="Search..." className="search-input" />
        </div>
        {/* <button className="create-post-btn"  onClick={handleCreateButtonClick}>
          <img  src={isPressed ? pressedCreate : create} alt="Create" aria-hidden="true" />
        </button> */}
        <Link to="/make-new-post" className="create-post-btn">
          <img src={isPressed ? pressedCreate : create} alt="Create" aria-hidden="true" />
        </Link>

         {/* <button className="profile-btn">
           <img src={Seconduser} alt="Profile"  />
         </button> */}
          <Link to="/profile" className="profile-btn">
          <img src={Seconduser} alt="Profile" />
        </Link>
      </header>

       <div className="forum-content">

       <div className="popular-topics-panel">
          <h2 style={{ textAlign: "center" }}>Popular Topics</h2>
          <ul>
            {['Topic 1', 'Topic 2', 'Topic 3', 'Topic 4', 'Topic 5'].map((topic, index) => (
              <div class="topic-item"><li key={index} className="tag-item">
                <span className="topic-circle"></span>
                {topic}
              </li></div>
            ))}
          </ul>
        </div>

        <div className="user-posts">
  {/* Маппинг постов */}
  {posts.map((post, index) => (
            <div key={index} className="post">
              <div className="post-header">
                <img src={Blackuser} alt="User Icon" className="user-icon" />
                <h2>{post.title}</h2>
              </div>
              <p>{post.content}</p>

            <div className="post-footer">
            <div className='delete-btn'>
              <button className='delete-btn basic-btn '> Delete</button>
            </div>
              <div className="rating">
              <button className="rating-button basic-btn ratingUp">
              <img src={arrowUp} alt="Upvote"></img>
              </button>
              <span className="rating-value"></span>
              <button className="rating-button basic-btn ratingDown">
                <img src={arroeDown} alt="Downvote"/>
              </button>
              </div>

              <button className="reply-button basic-btn">
                <img src={reply} alt="Reply"/><div className='textReply'>Reply</div>
              </button>
            </div>

          </div>  ))}
        </div>
        
      </div>
    </div>   
    );
  }  
export default Forum;



// function Forum() {

//   const [isPressed, setIsPressed] = useState(false);
  // const history = useHistory();

  // const handleCreateButtonClick = () => {
  //   setIsPressed(!isPressed); 
    // redirectToNewPostPage();

  // const redirectToNewPostPage = () => {
  //   history.push('/new-post');
  // };
  // };
  // return (
  //   <div className="forum-container">
  //     <header className="forum-header">
  //       <img src={Mylogo} alt="Forum Logo" className="forum-logo" />
  //       <div className="search-container">
  //         <img src={Search} alt="User" className="user-icon" />
  //         <input type="text" placeholder="Search..." className="search-input" />
  //       </div>
  //       <button className="create-post-btn"  onClick={handleCreateButtonClick}>
  //         <img  src={isPressed ? pressedCreate : create} alt="Create" aria-hidden="true" />
  //       </button>
         {/* <Link to="/create-post" className="create-post-btn" onClick={handleCreateButtonClick}>
          <img src={isPressed ? pressedCreate : create} alt="Create" aria-hidden="true" />
        </Link> */}
      //   <div className="profile-btn">
      //     <img src={Seconduser} alt="Profile"  />
      //   </div>
      // </header>

      // <div className="forum-content">
      //   <div className="popular-topics-panel">
      //     <h2>Popular Topics</h2>
      //     <ul>
      //       {['Topic 1', 'Topic 2', 'Topic 3', 'Topic 4', 'Topic 5'].map((topic, index) => (
              
      //         <><li key={index} className="topic-item">
      //           <span className="topic-circle"></span>
      //           {topic}
      //         </li>
      //         </>
      //       ))}
      //     </ul>
      //   </div>

      //   <div className="user-posts">
      //   <h2>User Posts</h2>
      //   <div className="post">
      //     <div className="post-header">
      //       <img src={Blackuser} alt="User Icon" className="user-icon" />
      //       <h3>Post Title</h3>
      //     </div>
      //     <p>Post content...</p>
      //       <div className="post-footer">
      //         <button className="rating-button">&#8593;</button>
      //         <button className="rating-button">&#8595;</button>
      //         <button className="reply-button" 
              // onClick={() => redirectToNewPostPage()}
//               >Reply</button>
//     </div>

//   </div>
// </div>

//       </div>
//     </div>
//   );
// }
// export default Forum;


// return (
//   <div className="forum-container">
// <header className="forum-header">
//   <img src={Mylogo} alt="Forum Logo" className="forum-logo" />
//   <div className="search-container">
//     <img src={Search} alt="User" className="user-icon" />
//     <input type="text" placeholder="Search..." className="search-input" />
//   </div>
//   {/* <button className="create-post-btn"  onClick={handleCreateButtonClick}>
//     <img  src={isPressed ? pressedCreate : create} alt="Create" aria-hidden="true" />
//   </button> */}
//   <Link to="/make-new-post" className="create-post-btn">
//     <img src={isPressed ? pressedCreate : create} alt="Create" aria-hidden="true" />
//   </Link>

//    {/* <button className="profile-btn">
//      <img src={Seconduser} alt="Profile"  />
//    </button> */}
//     <Link to="/profile" className="profile-btn">
//     <img src={Seconduser} alt="Profile" />
//   </Link>
// </header>

//  <div className="forum-content">

//  <div className="popular-topics-panel">
//     <h2 style={{ textAlign: "center" }}>Popular Topics</h2>
//     <ul>
//       {['Topic 1', 'Topic 2', 'Topic 3', 'Topic 4', 'Topic 5'].map((topic, index) => (
//         <div class="topic-item"><li key={index} className="tag-item">
//           <span className="topic-circle"></span>
//           {topic}
//         </li></div>
//       ))}
//     </ul>
//   </div>

//   <div className="user-posts">
//   <div className="post">

//     <div className="post-header">
//       <img src={Blackuser} alt="User Icon" className="user-icon" />
//       <h2>Post Title</h2>
//     </div>

//     <p>Post content...</p>

//       <div className="post-footer">
//       <div className='delete-btn'>
//         <button className='delete-btn basic-btn '> Delete</button>
//       </div>
//         <div className="rating">
//         <button className="rating-button basic-btn ratingUp">
//         <img src={arrowUp} alt="Upvote"></img>
//         </button>
//         <span className="rating-value"></span>
//         <button className="rating-button basic-btn ratingDown">
//           <img src={arroeDown} alt="Downvote"/>
//         </button>
//         </div>

//         <button className="reply-button basic-btn">
//           <img src={reply} alt="Reply"/><div className='textReply'>Reply</div>
//         </button>
//       </div>

//     </div>
//   </div>
  
// </div>
// </div>   
// );
// }  
// export default Forum;