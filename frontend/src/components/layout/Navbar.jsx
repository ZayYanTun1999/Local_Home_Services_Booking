export default function Navbar({ user, onOpenAuth }) {
    return (
        <div className="header-nav">
            <nav className="navbar navbar-expand-lg w-100">
                <div className="container-fluid">

                    {/* Mobile Toggle */}
                    <button
                        className="navbar-toggler ms-auto"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                    >
                        <span className="navbar-toggler-icon"></span>
                    </button>

                    {/* Menu */}
                    <div className="collapse navbar-collapse" id="navbarNav">
                        <ul className="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4 gap-3">

                            <li className="nav-item">
                                <a className="nav-link active" href="#home">Home</a>
                            </li>

                            <li className="nav-item">
                                <a className="nav-link" href="#about">About Us</a>
                            </li>

                            <li className="nav-item">
                                <a className="nav-link" href="#services">Services</a>
                            </li>

                            <li className="nav-item">
                                <a className="nav-link" href="#categories">Categories</a>
                            </li>

                            <li className="nav-item">
                                <a className="nav-link" href="#testimonials">Reviews</a>
                            </li>

                            <li className="nav-item">
                                <a className="nav-link" href="#contact">Contact</a>
                            </li>
                        </ul>

                        {/* Right Buttons */}
                        <div className="btn-box d-flex align-items-center gap-2">

                            {user ? (
                                <button className="btn btn-info">
                                    {user.name}
                                </button>
                            ) : (
                                <button className="btn btn-info">
                                    Guest
                                </button>
                            )}

                            <button
                                className="btn my-custom-button"
                                onClick={onOpenAuth}
                            >
                                Book Service
                            </button>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    );
}