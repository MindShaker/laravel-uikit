import React from 'react';
import { Link } from '@inertiajs/react'

import { IoCaretBack } from "react-icons/io5";
import { IoCaretForward } from "react-icons/io5";

export default function Pagination({ links }) {

    function label(text) {
        if (text.includes('Previous')) {
            return <IoCaretBack />
        } else if (text.includes('Next')) {
            return <IoCaretForward />
        } else {
            return text;
        }
    }

    return (
        links.length > 3 && (
            <div className="uk-margin">
                <div className="uk-pagination uk-flex-center">
                    {links.map((link, key) => (
                        link.url === null ?
                            (<li className="uk-disabled">
                                <span>{label(link.label)}</span>
                            </li>) :

                            (<li className={`${link.active ? "uk-active" : ""}`}>
                                <Link href={link.url}>
                                    {label(link.label)}
                                </Link>
                            </li>)
                    ))}
                </div>
            </div>
        )
    );
}
