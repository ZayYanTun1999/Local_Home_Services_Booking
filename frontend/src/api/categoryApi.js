import axios from "axios";

const API_URL = "http://localhost:8000/api";

export const getCategories = async () => {
    const res = await axios.get(`${API_URL}/categories`);
    return res.data;
};