import ApplicationLogo from '@/Components/ApplicationLogo';
import Dropdown from '@/Components/Dropdown'
import { Link, usePage } from '@inertiajs/react';
import React, { Children } from 'react'

export default function Authenticated({ children }) {
    const { auth } = usePage().props;

    return (
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
                                <Dropdown>
                                    <Dropdown.Trigger>
                                        <span className="uk-flex">
                                            {auth.user.name}
                                            <svg className="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width={20} height={20} viewBox="0 0 20 20" fill="currentColor"><path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd" /></svg>
                                        </span>
                                    </Dropdown.Trigger>

                                    <Dropdown.Content>
                                        <Dropdown.Link href={route('logout')} className='button-reset' method="post" as="button">
                                            Log Out
                                        </Dropdown.Link>
                                    </Dropdown.Content>
                                </Dropdown>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <main className='uk-height-expand'>
                <div className="uk-section">
                    <div className="">
                        {children}
                    </div>
                </div>
            </main>
        </div>
    )
}
