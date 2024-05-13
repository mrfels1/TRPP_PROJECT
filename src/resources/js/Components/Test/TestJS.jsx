import React, { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faArrowUp, faArrowDown } from '@fortawesome/free-solid-svg-icons';

const PostRatingButton = ({ onVote, initialValue }) => {
  const [vote, setVote] = useState(initialValue); // Отображение текущего голоса

  // Обработчик голосования
  const handleVote = (newVote) => {
    if (newVote !== vote) { // Проверяем, был ли уже отдан такой же голос
      setVote(newVote); // Устанавливаем новый голос
      onVote(newVote); // Отправляем голос на сервер
    } else {
      // Если голос уже отдан, сбрасываем его
      setVote(0);
      onVote(0);
    }
  };

  return (
    <div className="post-rating-button">
      {/* Кнопка для голоса вверх */}
      <button className={`upvote-button ${vote === 1 ? 'active' : ''}`} onClick={() => handleVote(1)}>
        <FontAwesomeIcon icon={faArrowUp} />
      </button>
      {/* Кнопка для голоса вниз */}
      <button className={`downvote-button ${vote === -1 ? 'active' : ''}`} onClick={() => handleVote(-1)}>
        <FontAwesomeIcon icon={faArrowDown} />
      </button>
    </div>
  );
};

export default PostRatingButton;