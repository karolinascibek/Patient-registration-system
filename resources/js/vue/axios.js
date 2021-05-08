import axios from 'axios';

axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
axios.defaults.headers.post['Content-Type'] = 'application/json';
const BASE_URL = "http://127.0.0.1:8000/";
export default BASE_URL;
