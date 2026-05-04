import { useState } from "react";
import Home from "./pages/Home";
import Layout from "./components/layout/Layout";
import AuthModal from "./components/auth/AuthModal";

function App() {
    const [showAuth, setShowAuth] = useState(false);

    const user = null; // later from auth API or context

    return (
        <>
            <Layout
                user={user}
                onOpenAuth={() => setShowAuth(true)}
            >
                <Home />
            </Layout>

            {showAuth && (
                <AuthModal onClose={() => setShowAuth(false)} />
            )}
        </>
    );
}

export default App;