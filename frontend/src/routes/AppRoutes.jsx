import { BrowserRouter, Routes, Route } from "react-router-dom";

import Home from "../pages/public/Home";
import Login from "../pages/public/Login";
import Register from "../pages/public/Register";

export default function AppRoutes() {
    return (
        <BrowserRouter>
            <Routes>

                {/* PUBLIC */}
                <Route path="/" element={<Home />} />
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />

            </Routes>
        </BrowserRouter>
    );
}