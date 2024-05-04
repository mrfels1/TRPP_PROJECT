import React from 'react' 
import './Login.css'
import email_icon from '../Assets/email.png' 
import password_icon from '../Assets/password.png' 
import { Link } from 'react-router-dom';
const Login = () => {

//   const [action,setAction] = useState("Sign Up");
  
  return (
    <div className='container'>
        <div className="header">
            <div className="text">Login</div>
            <div className='underline'> </div>
        </div>
        <div className="inputs">

        <div className="input">
            <img src={email_icon} alt="" />
            <input type="email" placeholder="Email"/>
        </div>
        <div className="input">
            <img src={password_icon} alt="" />
            <input type="password" placeholder="Password"/>
        </div>
        </div>


        <div className="checkbox-container">
        <input type="checkbox" name="myCheckbox" /> Remember me    
        </div>
        {/* <div className="goRegistr">Don't you have a profile? <span>Click Here!</span></div> */}
        <Link to="/registr">Don't you have a profile? <span>Click Here!</span></Link>
      

        <div className="submit-container">
        <Link to="/forum" className="submit">Login</Link>
        {/* <submit class="submit">Login</submit> */}
        </div>
    </div>
  )
}
export default Login;