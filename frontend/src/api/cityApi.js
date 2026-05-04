import axios from "axios";

const API = "http://127.0.0.1:8000/api/cities";

export const getCities = () => axios.get(API);
export const createCity = (data) => axios.post(API, data);
export const updateCity = (id, data) => axios.put(`${API}/${id}`, data);
export const deleteCity = (id) => axios.delete(`${API}/${id}`);