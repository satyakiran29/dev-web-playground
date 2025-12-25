import pic from './assets/ss.gif'
function Card(){
    return(
        <div className="card">
            <img className="card-image" src={pic} alt="profile" ></img>
            <h2 className="crad-name">Satya Kiran</h2>
            <p className="card-des">web developer</p>
        </div>
    );
}

export default Card;