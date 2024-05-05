
import './index.css';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Login from './Components/LogSighin/Login';
import Registr from './Components/LogSighin/Registr';
import Forum from './Components/ForumHome/Forum';
import MakeNewPost from './Components/NewPost/MakeNewPost';
import Profile from './Components/ForumHome/Profile';
import AllPosts from './Components/ForumHome/AllPosts';

function AppWeb() {
  return (
    <Router>
    <Switch>
      <Route path="/" exact component={Forum} />
      <Route path="/make-new-post" component={MakeNewPost} />
      <Route path="/profile" component={Profile} />
      <Route path="/all-posts" component={AllPosts} />
      <Route path="/login" component={Login} />
      <Route path="/registr" component={Registr} />
    </Switch>
  </Router>
  );
}
export default AppWeb;


