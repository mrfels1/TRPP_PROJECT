import React, { useState } from 'react';
import './styleProfile.css'; // Подключаем стили
import { Link } from 'react-router-dom';
function UserProfile() {
  const [username, setUsername] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleUsernameChange = (event) => {
    setUsername(event.target.value);
  };

  const handleEmailChange = (event) => {
    setEmail(event.target.value);
  };

  const handlePasswordChange = (event) => {
    setPassword(event.target.value);
  };

  const handleSubmit = () => {
    // Ваша логика для обновления профиля пользователя
    console.log('Username:', username);
    console.log('Email:', email);
    console.log('Password:', password);
    // Здесь вы можете добавить отправку данных на сервер или другие необходимые действия
  };

  return (
    <div className="user-profile-container">
      <div className="create-header">
      <h1>Your Profile</h1>
      <div className='underline'> </div>
      </div>
      <div className="input-container">
        <input   type="text"    placeholder="Username"   value={username}
          onChange={handleUsernameChange}   className="username-input" />
      </div>
      <div className="input-container">
        <input
          type="email"
          placeholder="Email"
          value={email}
          onChange={handleEmailChange}
          className="email-input"
        />
      </div>
      <div className="input-container">
        <input
          type="password"
          placeholder="Password"
          value={password}
          onChange={handlePasswordChange}
          className="password-input"
        />
      </div>
      <div className="button-container">
        <button onClick={handleSubmit} className="update-button">Update Profile</button>
        {/* <button className="goForum">Return</button> */}
        <Link to="/forum" className="goForum">Return</Link>
      </div>
    </div>
  );
}

export default UserProfile;
