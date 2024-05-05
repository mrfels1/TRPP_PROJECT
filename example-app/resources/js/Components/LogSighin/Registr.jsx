import React from 'react';
import './Registr.css';
import user_icon from '../Assets/person.png' ;
import email_icon from '../Assets/email.png' ;
import password_icon from '../Assets/password.png' ;
import { Link } from 'react-router-dom';
import axios from 'axios';

export const Registr = () => {
    const [error, setError] = useState('');

    const handleRegister = async (event) => {
      event.preventDefault();
  
      const formData = new FormData(event.target);
      const name = formData.get('name');
      const email = formData.get('email');
      const password = formData.get('password');
  
      if (!name || !email || !password) {
        setError('Please fill in all fields.');
        return;
      }
  
      const userData = {
        name,
        email,
        password,
      };
  
      try {
        // Отправка данных на сервер
        await axios.post('/register', userData);
  
        // Перенаправляем пользователя на страницу Forum после успешной регистрации
        window.location.href = '/forum';
      } catch (error) {
        console.error('Ошибка при регистрации:', error);
        // Обработка ошибок регистрации
      }
    };

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
        <input type="password" placeholder="Password again"/>
    </div>
 </div>

   

 {error && <div className='error'>{error}</div>}
 {/* <div className="goLogin">Already registered? <span>Click Here!</span></div> */}
 <Link to="/login">Already registered? <span>Click Here!</span></Link>

 <div className="submit-container">
 {/* <Link to="/forum" className="submit">Register</Link> */}
 {/* <submit class="submit">Register</submit> */}
 <form onSubmit={handleRegister}>
      <button type="submit" className="submit">Register</button>
      <Link to="/forum" className="redirect">Go to Forum</Link>
    </form>
 </div>
</div>
  )
}
export default Registr;



