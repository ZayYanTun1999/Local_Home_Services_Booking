import { useState } from "react";

export default function Header({ user, onOpenAuth }) {
    return (
        <div className="header">
            <div className="main-header">
                <div className="container-fluid container-lg">
                    <div className="d-flex align-items-center justify-content-between">

                        {/* Logo */}
                        <a className="navbar-brand" href="/">
                            <img
                                src="/img/logo.png"
                                alt="HomeTrust Logo"
                                height="50"
                            />
                        </a>

                        {/* Auth Button */}
                        <button
                            className="btn user-icon"
                            onClick={onOpenAuth}
                            title="Sign In / Register"
                        >
                            <i className="ri-user-settings-line"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    );
}