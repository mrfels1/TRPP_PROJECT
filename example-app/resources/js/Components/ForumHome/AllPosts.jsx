import React, { useState } from 'react';
import './styleAllPosts.css';
import { Link } from 'react-router-dom';
function AllPosts() {
    
    return (
        <div>
            {/* <button className='goForum'> Return </button> */}
            <Link to="/forum" className="goForum">Return</Link>
        </div>
    );
}

export default AllPosts;