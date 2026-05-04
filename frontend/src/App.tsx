import { useState } from "react";

import Home from "./pages/Home/Home";
import AuthModal from "./components/auth/AuthModal";

function App() {
    const [showAuth, setShowAuth] = useState(false);

    return (
        <>
            <Home openAuth={() => setShowAuth(true)} />

            {showAuth && (
                <AuthModal onClose={() => setShowAuth(false)} />
            )}
        </>
    );
}

export default App;