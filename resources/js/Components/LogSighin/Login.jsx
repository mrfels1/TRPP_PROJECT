import React from 'react' 
import './Login.css'
import email_icon from '../Assets/email.png' 
import password_icon from '../Assets/password.png' 
import { Link } from 'react-router-dom';
import axios from 'axios';
const Login = () => {

//   const [action,setAction] = useState("Sign Up");
const [email, setEmail] = useState('');
const [password, setPassword] = useState('');
const [error, setError] = useState('');

const handleLogin = async (event) => {
  event.preventDefault();

  try {
    const response = await axios.post('/login', { email, password });
    console.log(response.data); // Результат успешного входа (если необходимо)

    // Перенаправление на страницу форума после успешного входа
    window.location.href = '/forum';
  } catch (error) {
    console.error('Ошибка при входе:', error);
    setError('Invalid email or password.'); // Устанавливаем сообщение об ошибке
  }
};
  return (
    <div className='container'>
        <div className="header">
            <div className="text">Login</div>
            <div className='underline'> </div>
        </div>
        <div className="inputs">

        <div className="input">
            <img src={email_icon} alt="" />
            <input type="email" placeholder="Email"
               value={email} 
               onChange={(e) => setEmail(e.target.value)} />
        </div>

        <div className="input">
            <img src={password_icon} alt="" />
            <input type="password" placeholder="Password"
            value={password} 
            onChange={(e) => setPassword(e.target.value)} />
        </div>
        </div>

        {error && <div className='error'>{error}</div>}
        <div className="checkbox-container">
        <input type="checkbox" name="myCheckbox" /> Remember me    
        </div>
        {/* <div className="goRegistr">Don't you have a profile? <span>Click Here!</span></div> */}
        <Link to="/registr">Don't you have a profile? <span>Click Here!</span></Link>
      

        <div className="submit-container">
        <button onClick={handleLogin} className="submit">Login</button>
      
        {/* <Link to="/forum" className="submit">Login</Link> */}
        {/* <submit class="submit">Login</submit> */}
        </div>
    </div>
  )
}
export default Login;