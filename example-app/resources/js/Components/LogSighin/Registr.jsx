import React from 'react';
import './Registr.css';
import user_icon from '../Assets/person.png' ;
import email_icon from '../Assets/email.png' ;
import password_icon from '../Assets/password.png' ;
import { Link } from 'react-router-dom';
export const Registr = () => {

  return (
 <div className='container'>
 <div className="header">
     <div className="text">Register</div>
     <div className='underline'> </div>
 </div>
 <div className="inputs">

 <div className="input">
            <img src={user_icon} alt="" />
            <input type="text" placeholder="Name"/>
</div>
 <div className="input">
     <img src={email_icon} alt="" />
     <input type="email" placeholder="Email"/>
 </div>
 <div className="input">
     <img src={password_icon} alt="" />
     <input type="password" placeholder="Password"/>
 </div>
 <div className="input">
        <img src={password_icon} alt="" />
        <input type="text" placeholder="Password"/>
    </div>
 </div>

   

 {/* <div className="goLogin">Already registered? <span>Click Here!</span></div> */}
 <Link to="/login">Already registered? <span>Click Here!</span></Link>

 <div className="submit-container">
 <Link to="/forum" className="submit">Register</Link>
 {/* <submit class="submit">Register</submit> */}
 </div>
</div>
  )
}
export default Registr;



