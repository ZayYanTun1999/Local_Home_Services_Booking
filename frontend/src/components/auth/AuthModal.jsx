export default function AuthModal() {
    return (
        <div className="modal fade" id="authModal" tabIndex="-1">
            <div className="modal-dialog">
                <div className="modal-content">

                    <div className="modal-header">
                        <h5>Login or Register</h5>
                        <button className="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div className="modal-body text-center">
                        <p>Please log in or sign up to book a service.</p>

                        <div className="d-flex justify-content-center gap-3">
                            <a href="/login" className="btn btn-primary">
                                Login
                            </a>

                            <a href="/register" className="btn btn-outline-primary">
                                Register
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    );
}