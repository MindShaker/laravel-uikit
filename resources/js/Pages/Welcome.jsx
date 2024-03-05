import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link, Head } from '@inertiajs/react';

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Welcome" />

            <div id="app" className="uk-section-muted uk-height-viewport">
                <div className="uk-dark uk-box-shadow-medium uk-section-default">
                    <nav className="uk-navbar-container uk-navbar-transparent ">
                        <div className="uk-container uk-container-large">
                            <div className="uk-navbar" data-uk-navbar>
                                <div className="uk-navbar-left">
                                    <Link href="/">
                                        <ApplicationLogo height={25} className="" />
                                    </Link>
                                    <ul className={`uk-navbar-nav uk-tab`} >
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                    </ul>
                                </div>
                                <div className="uk-navbar-right">
                                    <ul className="uk-navbar-nav">
                                        {auth.user ? (
                                            <li>
                                                <Link href="/dashboard">Dashboard</Link>
                                            </li>
                                        ) : (
                                            <>
                                                <li>
                                                    <Link href={route('login')}>Login</Link>
                                                </li>
                                                <li>
                                                    <Link href={route('register')}>Register</Link>
                                                </li>
                                            </>
                                        )}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <main className='uk-height-expand'>
                    <div className="uk-section">
                        <div className="uk-container">
                            Welcome
                        </div>
                    </div>
                </main>
            </div>
        </>
    );
}
