export default function Contact() {
    return (
        <section id="contact" className="py-5">
            <div className="container">

                <h2>Contact Us</h2>

                <form>
                    <input placeholder="Name" className="form-control mb-2" />
                    <input placeholder="Email" className="form-control mb-2" />
                    <textarea placeholder="Message" className="form-control mb-2" />
                    <button className="btn btn-primary">Send</button>
                </form>

            </div>
        </section>
    );
}