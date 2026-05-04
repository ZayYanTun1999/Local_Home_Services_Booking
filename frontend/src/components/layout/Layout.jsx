import Header from "./Header";
import Navbar from "./Navbar";

export default function Layout({ children, user, onOpenAuth }) {
    return (
        <>
            <Header user={user} onOpenAuth={onOpenAuth} />
            <Navbar user={user} onOpenAuth={onOpenAuth} />

            <main>
                {children}
            </main>
        </>
    );
}