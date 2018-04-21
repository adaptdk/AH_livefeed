import React from "react";
import { compose, withProps, lifecycle, withState } from "recompose";
import {
  withScriptjs,
  withGoogleMap,
  GoogleMap,
  Marker
} from "react-google-maps";
import Websocket from 'react-websocket';

import { APIKEY, WEBSOCKETS_URL } from "./constants/App";

const Map = compose(
  withProps({
    googleMapURL: `https://maps.googleapis.com/maps/api/js?key=${APIKEY}&v=3.exp&libraries=geometry,drawing,places`,
    loadingElement: <div style={{ height: `100%` }} />,
    containerElement: <div style={{ height: `400px` }} />,
    mapElement: <div style={{ height: `100%` }} />
  }),
  withScriptjs,
  withGoogleMap
)(props => (
  <GoogleMap defaultZoom={6} defaultCenter={{ lat: 55.676098, lng: 12.568337 }}>
      { props.markers }
  </GoogleMap>
));


class MyFancyComponent extends React.PureComponent {
  constructor(props) {
    super(props);
    this.state = {
      markers: [],
    };
  }

  orderToMarker = (order) => (
    <Marker position={{ lat: order.lat, lng: order.long }} key={order.id} />
  );

  handleData = (data) => {
    const order = JSON.parse(JSON.parse(data));
    this.setState({ markers: [...this.state.markers, this.orderToMarker(order)] });
  }

  render() {
    return (
      <div>
        <Map
          markers={this.state.markers}
        />
        <Websocket
          url={ WEBSOCKETS_URL }
          onMessage={ this.handleData.bind(this) }
        />
      </div>
    )
  }
}

export default MyFancyComponent;
