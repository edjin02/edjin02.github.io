"use client"; //useref error handler
import React from 'react'
import Image from "next/image";
import { TypeAnimation } from 'react-type-animation';
import { motion } from "framer-motion";

const HeroSection = () => {
  return (
    <section className='lg:py-16'>
        <div className="grid grid-cols-1 sm:grid-cols-12">
            <motion.div
             initial={{ opacity: 0, scale: 0 }} 
             animate={{ opacity: 1, scale: 1 }} 
             transition={{ duration: 0.5}} 
            className="col-span-7 place-self-center text-center sm:text-left justify-self-start"
            >
                <h1 className="text-white mb-4 text-4xl sm:text-5xl lg:text-8xl lg:leading-normal  font-extrabold">
                <span className="text-transparent bg-clip-text bg-gradient-to-r from-secondary-400 to-primary-400"> 
                Hello, I'm {" "} 
                </span>
                <br></br>
                <TypeAnimation
                sequence={[
                    // Same substring at the start will only be typed out once, initially
                    'Early Bauan',
                    1000, // wait 1s before replacing string with next string
                    'Web Developer',
                    1000,
                    'BSIT Fresh Grad',
                    1000
                ]}
                wrapper="span"
                speed={50}
                repeat={Infinity}
                />

                </h1>
                <p className="text-[#ADB7BE] text-base sm:text-lg mb-6 lg:text-xl">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Distinctio expedita totam facilis quas saepe, voluptas cupiditate at 
                    ipsam, commodi.
                </p>
                {/* hire me button and cv  */}
                <div>
                    <button className="px-6 py-3 w-full sm:w-fit rounded-full mr-4 bg-gradient-to-br from-tertiary-500 via-secondary-500 to-primary-500 hover:bg-slate-200 text-white">
                        Hire Me
                    </button>
                    <button className="px-1 py-1 w-full sm:w-fit rounded-full bg-gradient-to-br from-primary-500 via-secondary-500 to-tertiary-500 hover:bg-slate-800 text-white mt-3">
                    <span className="block bg-[#121212] hover:bg-slate-800 rounded-full px-5 py-2">Download CV</span>
                    </button>
                </div>
            </motion.div>
        {/* image profile  */}
        {/* animation for image transition per load */}
        <motion.div
             initial={{ opacity: 0, scale: 0 }} 
             animate={{ opacity: 1, scale: 1 }} 
             transition={{ duration: 0.5}}  
             className="col-span-5 place-self-center mt-4 lg:mt-0 relative">
            <div className='bg-gradient-to-r from-primary-900 to-secondary-900 rounded-full h-full w-full z-0 blur-lg absolute top-0 left-0 transform -translate-x-1 -translate-y-1'></div>
            <div className="rounded-full overflow-hidden bg-[#181818] w-[250px] h-[250px] lg:w-[400px] lg:h-[400px] relative">
                <Image
                    src="/images/program.jpeg"
                    alt="profile image"
                    className="object-cover w-full h-full"
                    layout="fill"
                />
            </div>
        </motion.div>


    </div>
    </section>
  )
}

export default HeroSection