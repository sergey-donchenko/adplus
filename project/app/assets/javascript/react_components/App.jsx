// /** @jsx React.DOM */
// var React  = require('react');
// var sUrl   = window.location.href;
// var sPages = sUrl.match(/admin\/(.*)/gi);
// var sPage  = null;

// if ( sPages && sPages.length > 0 ) {
//     sPages.forEach(function(item) {
//         sPage = item;
//     });
// }

// switch( sPage ) {
//     case 'admin/category':
//         console.log( 'Do something with the category....' );
//         break;

//     default:
//         console.log('Just do nothing....');    
// }



// console.log( sPage );




// var DefaultRoute = Router.DefaultRoute;
// var Link = Router.Link;
// var Route = Router.Route;
// var RouteHandler = Router.RouteHandler;

// var App = React.createClass({
//   render: function () {
//     return (
//       <div>
//         <header>
//           <ul>
//             <li><Link to="app">Dashboard</Link></li>
//             <li><Link to="inbox">Inbox</Link></li>
//             <li><Link to="calendar">Calendar</Link></li>
//           </ul>
//           Logged in as Jane
//         </header>

//         {/* this is the important part */}
//         <RouteHandler/>
//       </div>
//     );
//   }
// });

// var Inbox = React.createClass({
//   render: function () {
//     return (
//       <div>
//         <header>          
//           Here is Inbox section
//         </header>

//         {/* this is the important part */}
//         <RouteHandler/>
//       </div>
//     );
//   }
// });

// var Calendar = React.createClass({
//   render: function () {
//     return (
//       <div>
//         <header>          
//           Here is Calendar section
//         </header>

//         {/* this is the important part */}
//         <RouteHandler/>
//       </div>
//     );
//   }
// });

// var Dashboard = React.createClass({
//   render: function () {
//     return (
//       <div>
//         <header>          
//           Here is Dashboard section
//         </header>

//         {/* this is the important part */}
//         <RouteHandler/>
//       </div>
//     );
//   }
// });

// var routes = (
//   <Route name="app" path="/" handler={App}>
//     <Route name="inbox" handler={Inbox}/>
//     <Route name="calendar" handler={Calendar}/>
//     <DefaultRoute handler={Dashboard}/>
//   </Route>
// );

// Router.run(routes, function (Handler) {
//   React.render(<Handler/>, document.body);
// });

//alert('Just for test');
// var Profile = require('./Profile.jsx');

// React.render(
//     <Profile
//         username="Simon"
//         bio="My name is Simon. I make websites"
//         avatar="http://simonsmith.io/assets/images/me.jpg"
//     />,
// document.body);
