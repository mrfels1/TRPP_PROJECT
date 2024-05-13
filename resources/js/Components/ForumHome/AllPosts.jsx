import React, { useState } from 'react';
import './styleAllPosts.css';
import { Link, useHistory } from 'react-router-dom';

function Post({ post, onReply }) {
    return (
      <div className="post">
        <div className="post-header">
          <h2>{post.title}</h2>
          <p>{post.userName}</p>
        </div>
        <p>{post.content}</p>
        <button onClick={() => onReply(post.id)}>Reply</button>
        {post.replies.length > 0 && (
          <div className="post-replies">
            {post.replies.map(reply => (
              <Post key={reply.id} post={reply} onReply={onReply} />
            ))}
          </div>
        )}
      </div>
    );
  }
function AllPosts() {
    const history = useHistory(); 

    const posts = [/* список постов полученный с сервера */];
  
    const handleReply = (postId) => {

    };

    return (
        <div>
        <Link to="/forum" className="goForum">Return</Link>
      <div className="posts-container">
        {posts.map(post => (
          <Post key={post.id} post={post} onReply={handleReply} />
        ))}
      </div>
      </div>
    );
}

export default AllPosts;