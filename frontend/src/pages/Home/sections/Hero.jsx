export default function Hero({ openAuth }) {
    return (
        <section id="home" className="hero-section">
            <div className="container">
                <div className="row align-items-center">

                    <div className="col-lg-6">
                        <h1>
                            Your Home, Handled. With Expert Services
                        </h1>

                        <p>
                            Connect with trusted local professionals for all home services.
                        </p>

                        <div className="d-flex gap-3">
                            <a href="#services" className="btn btn-primary">
                                Explore Services
                            </a>

                            <button
                                onClick={openAuth}
                                className="btn btn-outline-primary"
                            >
                                Get Started
                            </button>
                        </div>
                    </div>

                    <div className="col-lg-6">
                        <img
                            src="/img/home-section.jpg"
                            className="img-fluid"
                            alt="Home Services"
                        />
                    </div>

                </div>
            </div>
        </section>
    );
}